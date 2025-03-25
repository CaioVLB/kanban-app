export default (weight) => ({
  form: {
    weight: weight ?? '',
  },
  routes: {
    update: '',
    redirect: '',
  },
  isLoadingAction: false,

  submitEvaluation(evaluationId, type) {
    this.routes.update = this.replaceRouteParams(window.routes.evaluation.update, evaluationId, type);
  },

  openModalConfirmEvaluation(clientId) {
    this.routes.redirect = window.routes.evaluation.redirect.replace(':client_id', clientId);
    this.$dispatch('open-modal', 'confirm-action-modal');
  },

  replaceRouteParams(route, id, type) {
    return route.replace(':evaluation_id', id).replace(':type', type);
  },

  formatWeight(value) {
    value = value.replace(/[^0-9]/g, '');

    value = value.slice(0, 5);

    if (value.length >= 3) {
      const decimalIndex = value.length - 2;
      value = value.slice(0, decimalIndex) + '.' + value.slice(decimalIndex);
    }

    return value;
  },

  handlePrint() {
    const contents = document.getElementById('evaluation_print').innerHTML;
    const htmlParaImpressao = `
          <html>
            <head>
              <title>Avaliação do Paciente</title>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
              <style>
                @media print {
                  @page {
                    size: A4;
                    margin: 2cm;
                  }
                }
              </style>
            </head>
            <body>
              ${contents}
            </body>
          </html>
        `;

    let blob = new Blob([htmlParaImpressao], {
      type: "text/html"
    });

    let iFrame = document.createElement("iframe");
    iFrame.addEventListener("load", function() {
      iFrame.contentWindow.focus();
      iFrame.contentWindow.print();

      window.setTimeout(function() {
        document.body.removeChild(iFrame);
        URL.revokeObjectURL(iFrame.src);
      }, 0);
    });

    iFrame.style.display = "none";
    iFrame.src = URL.createObjectURL(blob);
    document.body.appendChild(iFrame);
  }
})
