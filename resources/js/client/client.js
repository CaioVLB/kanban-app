export default () => ({
  clients: [
    { id: 1, name: 'Caio Vitor Lima Brito', phone: '(99) 99999-9999', email: 'caiovitor@exclusivebee.com.br'  },
    { id: 2, name: 'Anderson Krautheim', phone: '(99) 99999-9999', email: 'andersonkrautheim@exclusivebee.com.br' },
    { id: 3, name: 'Eliza Mezzalira', phone: '(99) 99999-9999', email: 'elizamezzalira@exclusivebee.com.br' },
  ],
  form: {
    name: '',
    phone: '',
    email: ''
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-client');
  },

  resetForm() {
    this.form = {
      id: null,
      name: '',
      phone: '',
      email: ''
    };
  },

  submitForm() {
      this.clients.push({ ...this.form, id: this.clients.length + 1 });
      this.$dispatch('close-modal', 'create-client');
  }
});
