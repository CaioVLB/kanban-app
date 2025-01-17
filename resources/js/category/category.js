export default () => ({
  form: {
    category: ''
  },
  routes: {
    create: window.routes.categories.create,
    update: '',
    delete: '',
  },
  originName: '',
  isLoadingCategoryAdd: false,
  isLoadingCategoryDeletion: false,
  isLoadingModifyStatus: false,
  mode: 'create',

  openModalCategory(mode, categoryId = null, categoryName = '') {
    this.mode = mode;
    if (this.mode === 'edit') {
      this.routes.update = window.routes.categories.update.replace(':id', categoryId);
      this.form.category = categoryName;
      this.originName = categoryName;
    } else {
      this.form.category = '';
    }
    this.$dispatch('open-modal', 'category-modal');
  },

  openModalDeleteCategory(categoryId, categoryName) {
    this.routes.delete = window.routes.categories.delete.replace(':id', categoryId);
    this.originName = categoryName;
    this.$dispatch('open-modal', 'delete-category-modal');
  },

  modifyStatus (categoryId, originStatus) {
    if (!categoryId) return;

    this.isLoadingModifyStatus = true;

    axios.put(`/api/category/${categoryId}/is_active`)
      .catch(error => {
        document.getElementById(`is_active_category_${categoryId}`).checked = originStatus;
      })
      .finally( () => {
        this.isLoadingModifyStatus = false;
      });
  }
})
