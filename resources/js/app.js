import './bootstrap';
import 'flowbite';
import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';

import CreateBoard from './board/create_board';
import KanbanBoard from './kanban_board.js';
import Client from './client/client.js';
import ClientInformation from './client/dashboard/client_information/client_information.js';
import Collaborator from './collaborator/collaborator.js';
import CollaboratorInformation from './collaborator/dashboard/collaborator_information/collaborator_information.js';
import CollaboratorAddress from './collaborator/dashboard/collaborator_information/collaborator_address.js';
import Role from './role/role.js';

Alpine.data('create_board', CreateBoard);
Alpine.data('kanban_board', KanbanBoard);
Alpine.data('client', Client);
Alpine.data('client_information', ClientInformation);
Alpine.data('collaborator', Collaborator);
Alpine.data('collaborator_information', CollaboratorInformation);
Alpine.data('collaborator_address', CollaboratorAddress);
Alpine.data('role', Role);

window.Alpine = Alpine;

Alpine.plugin(mask);

Alpine.start();
