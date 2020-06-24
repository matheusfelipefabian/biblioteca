<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank">
                <img alt="CakePHP" src="/biblioteca/webroot/img/LOGO.jpg" width="250" />
            </a>
            <h1>
                BEM VINDO À BIBTECA
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="message default text-center">
                            <small>Please be aware that this page will not be shown if you turn off debug mode unless you replace templates/Pages/home.php with your own version.</small>
                        </div>
                        <?php Debugger::checkSecurityKeys(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                    <div class="box">
                        <?php
                        echo $this->Html->link(__('<h1 class="section">LIVROS</h1>'), 
                            [
                                'controller' => 'books'
                            ], 
                            array('escape' => false,'style'=>'text-decoration:none')
                        );
                        ?>
                    </div>
                    <div class="box">
                        <?php
                        echo $this->Html->link(__('<h1 class="section">CLIENTES</h1>'), 
                            [
                                'controller' => 'books'
                            ], 
                            array('escape' => false,'style'=>'text-decoration:none')
                        );
                        ?>
                    </div>
                    <div class="box">
                        <?php
                        echo $this->Html->link(__('<h1 class="section">EMPRÉSTIMOS</h1>'), 
                            [
                                'controller' => 'books'
                            ], 
                            array('escape' => false,'style'=>'text-decoration:none')
                        );
                        ?>
                    </div>
                    </div>
                    <div class="column">
                        <div class="box">
                            <h1 class="section">EDITORAS</h1>
                        </div>
                        <div class="box">
                            <h1 class="section">AUTORES</h1>
                        </div>
                        <div class="box">
                            <h1 class="section">GÊNEROS</h1>
                        </div>
                    </div>
                </div>
                
    </main>
</body>
</html>
