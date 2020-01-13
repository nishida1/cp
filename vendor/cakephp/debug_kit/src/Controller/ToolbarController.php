<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace DebugKit\Controller;

use Cake\Cache\Cache;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;

/**
 * Provides utility features need by the toolbar.
 */
class ToolbarController extends Controller
{
    /**
     * View class
     *
     * @var string
     */
    public $viewClass = 'Cake\View\JsonView';

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
    }

    /**
     * Before filter handler.
     *
     * @param \Cake\Event\EventInterface $event The event.
     * @return void
     * @throws \Cake\Http\Exception\NotFoundException
     */
    public function beforeFilter(EventInterface $event)
    {
        // TODO add config override.
        if (!Configure::read('debug')) {
            throw new NotFoundException();
        }
    }

    /**
     * Clear a named cache.
     *
     * @return void
     * @throws \Cake\Http\Exception\NotFoundException
     */
    public function clearCache()
    {
        $this->request->allowMethod('post');
        if (!$this->request->getData('name')) {
            throw new NotFoundException(__d('debug_kit', 'Invalid cache engine name.'));
        }
        $result = Cache::clear($this->request->getData('name'));
        $this->set('success', $result);
        $this->viewBuilder()->setOption('serialize', ['success']);
    }
}
