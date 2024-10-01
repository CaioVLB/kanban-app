export default () => ({
    addStage: false,
    addCard: false,
    stages: [],
    stageName: "",
    cardContent: "",

    init() {

    },

    createStage() {
      let newStage = {
        id: this.stages.length + 1,
        name: this.stageName,
        cards: []
      }

      this.stages.push(newStage);
      this.stageName = "";
      this.addStage = false;
    },

    cancelStageAddition() {
      this.stageName = "";
      this.addStage = false;
    },

    createCard(stageIndex) {
      let newCard = {
        id: this.stages[stageIndex].cards.length + 1,
        content: this.stages[stageIndex].cardContent,
      }

      this.stages[stageIndex].cards.push(newCard);
      this.stages[stageIndex].cardContent = "";
      this.stages[stageIndex].addCard = false;
    },

    cancelCardAddition(stageIndex) {
        this.stages[stageIndex].addCard = false;
        this.stages[stageIndex].cardContent = "";
    }

    //editStage() {
      //let newStageName = {
        //name: this.newStageName,
      //}
      //findIndex -> procurar pelo elemento especifico e atualizar o nome
      //this.stages.push(newStageName);
    //}
});
