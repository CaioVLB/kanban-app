export default (weight) => ({
  form: {
    weight: weight ?? '',
  },
  routes: {
    update: '',
  },
  isLoadingEvaluationAdd: false,

  /*replaceRouteParams(route, id, type) {
    return route.replace(':id', id).replace(':type', type);
  },*/

  //não deu certo
  formatWeight(value) {
    value = value.replace(/[^0-9.]/g, '');
    value = value.slice(0, 3);

    if (value.indexOf('.') !== -1) {
      const decimalPart = value.split('.')[1];
      if (decimalPart.length > 2) {
        value = value.slice(0, -1);
      }
    }

    return value; // Return the formatted value
  },
})
