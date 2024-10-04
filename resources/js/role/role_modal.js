export default () => ({
  roles: [
    { id: 1, name: 'Developer Exclusive Bee', collaborators: 2 },
    { id: 2, name: 'Designer', collaborators: 3 }
  ],
  formData: { id: '', name: '' },  // Dados do formulário da modal.
  isEditing: false,  // Indica se a modal está em modo de edição.

  openModal(action, role = null) {
    console.log(action, role)
    this.isEditing = (action === 'edit');
    if (this.isEditing && role) {
      // Preenche o formulário com os dados do cargo selecionado.
      this.formData = { ...role };
    } else {
      // Reseta o formulário para um novo cargo.
      this.formData = { id: '', name: '' };
    }
    // Abre a modal.
    document.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'modal-role' } }));
  }
});
