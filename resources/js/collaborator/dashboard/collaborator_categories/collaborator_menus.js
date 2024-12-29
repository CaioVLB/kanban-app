export default () => ({
  menu: 'collaborator_record',
  active_menu: 'bg-amber-200 border rounded-lg border-amber-300 font-bold text-amber-600 shadow focus:outline-none hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700',
  inactive_menu: 'bg-white border rounded-lg border-gray-200 shadow hover:text-gray-900 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white',

  setMenu(menu) {
    this.menu = menu;
  }
});
