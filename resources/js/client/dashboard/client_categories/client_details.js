export default (data, age) => ({
  isLoading: false,
  birthdate: data?.birthdate ?? '',
  legalResponsible: data?.legal_responsible,
  cpfLegalResponsible: data?.cpf_legal_responsible,
  age: age ?? '',
  isMinor: age && age < 18,

  updateAge() {
    if (!this.birthdate) {
      this.age = '';
      this.isMinor = false;
      return;
    }

    const birthdate = new Date(this.birthdate);
    const today = new Date();

    let age = today.getFullYear() - birthdate.getFullYear();
    const monthDiff = today.getMonth() - birthdate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
      age--;
    }

    this.age = age;
    this.isMinor = age < 18;
  },
});
