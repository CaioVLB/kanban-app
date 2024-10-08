import './bootstrap';
import 'flowbite';
import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';

import KanbanBoard from './kanban_board.js';
import RoleModal from './role/role_modal.js';
import CollaboratorModule from './collaborator/collaborator_module.js';

Alpine.data('kanban_board', KanbanBoard);
Alpine.data('role_modal', RoleModal);
Alpine.data('collaborator_module', CollaboratorModule);

window.Alpine = Alpine;

Alpine.plugin(mask);

Alpine.start();
