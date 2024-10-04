import './bootstrap';
import 'flowbite';
import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';

import KanbanBoard from './kanban_board.js';
import RoleModal from './role/role_modal.js';

Alpine.data('kanban_board', KanbanBoard);
Alpine.data('role_modal', RoleModal);

window.Alpine = Alpine;

Alpine.plugin(mask);

Alpine.start();
