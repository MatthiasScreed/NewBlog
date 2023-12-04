<?php

use App\Models\Post;

function check_user_permissions($request, $actionName = NULL, $id = NULL) : bool
{
    // Utilisateur actuel
    $currentUser = $request->user();

    if ($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = $request->route()->getActionName();
    }

    // Séparation du nom du contrôleur et de la méthode
    [$controller, $method] = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'post'     => 'post',
        'user'     => 'user',
        'category' => 'category'
    ];

    foreach ($crudPermissionsMap as $permission => $methods)
    {
        if(in_array($method, $methods) && isset($classesMap[$controller])) {
            $className = $classesMap[$controller];
            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])) {
                $id = !is_null($id) ? $id : $request->route('posts');

                if ($id && (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post'))) {
                    // Utilisation de findOrFail pour gérer le cas où l'id n'existe pas
                    $post = Post::withTrashed()->findOrFail($id);

                    if ($post->author_id !== $currentUser->id) {
                        return false;
                    }
                }
            } // if the user has not permission don't allow the next request
            elseif (!$currentUser->can("{$permission}-{$className}")) {
                return false;
            }

            break;
        }
    }

    return true;
}
