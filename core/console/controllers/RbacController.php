<?php

namespace console\controllers;

use common\models\User;
use vinacms\rbac\OwnModelRule;
use yii\console\Controller;
use yii\helpers\Console;

class RbacController extends Controller {
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        //Banned
        $banned = $auth->createRole(User::ROLE_BANNED);
        $banned->description = 'Banned Role';
        $auth->add($banned);

        //User
        $user = $auth->createRole(User::ROLE_USER);
        $user->description = 'User Role';
        $auth->add($user);
        $auth->addChild($user, $banned);

        //Own Model Permission
        $ownModelRule = new OwnModelRule();
        $auth->add($ownModelRule);

        //Editor
        $editor = $auth->createRole(User::ROLE_EDITOR);
        $editor->description = 'Manager content, SEO';
        $auth->add($editor);
        $auth->addChild($editor, $user);

        //Access to Backend Permission
        $accessBackend = $auth->createPermission('accessBackend');
        $accessBackend->description = 'User have permission login to Backend';
        $auth->add($accessBackend);
        $auth->addChild($editor, $accessBackend);

        //Manager
        $manager = $auth->createRole(User::ROLE_MANAGER);
        $manager->description = 'Manager';
        $auth->add($manager);
        $auth->addChild($manager, $editor);

        //Admin
        $admin = $auth->createRole(User::ROLE_ADMIN);
        $admin->description = 'Admin';
        $auth->add($admin);
        $auth->addChild($admin, $manager);

        //Admin
        $super_admin = $auth->createRole(User::ROLE_SUPER_ADMIN);
        $super_admin->description = 'Admin';
        $auth->add($super_admin);
        $auth->addChild($super_admin, $admin);

        //Assign user
        $auth->assign($super_admin, 1);

        Console::output('Success! RBAC roles has been added.');

    }
}