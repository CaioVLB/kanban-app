export default (evaluationId) => ({
  form: {
    date: '',
    observations: '',
    nextSteps: ''
  },
  routes: {
    create: window.routes.evolution.create.replace(':id', evaluationId),
    update: '',
    delete: '',
  },
  isLoadingEvolutionAdd: false,
  isLoadingEvolutionDeletion: false,
  detailsVisible: [],
  mode: 'create',

  openModalEvolution(mode, evolutionId = null, date = '', observations = '', nextSteps= '') {
    this.mode = mode;
    if (this.mode === 'edit') {
      this.routes.update = this.replaceRouteParams(window.routes.evolution.update, evolutionId);
      this.form.date = date;
      this.form.observations = observations;
      this.form.nextSteps = nextSteps;
    } else {
      this.form.date = '';
      this.form.observations = '';
      this.form.nextSteps = '';
    }
    this.$dispatch('open-modal', 'evolution-modal');
  },

  openModalDeleteEvolution(evolutionId) {
    this.routes.delete = this.replaceRouteParams(window.routes.evolution.delete, evolutionId)
    this.$dispatch('open-modal', 'delete-evolution-modal');
  },

  replaceRouteParams(route, id) {
    return route.replace(':id', id);
  },

  handleEvolutionPrint() {
    const evolutionElements = document.querySelectorAll('[id^="evolution_print_"]');

    let contents = '';
    evolutionElements.forEach(element => {
      contents += element.innerHTML;
      contents += '<hr>';
    });

    const htmlParaImpressao = `
          <html>
            <head>
              <title>Evolução do Paciente</title>
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
              <h1 class="text-center font-bold text-black">EVOLUÇÃO DO PACIENTE</h1>
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
