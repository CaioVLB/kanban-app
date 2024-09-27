const draggables = document.querySelectorAll(".card");
const droppables = document.querySelectorAll(".stage");

draggables.forEach((card) => {
    card.addEventListener("dragstart", () => {
        card.classList.add("is-dragging");
    });
    card.addEventListener("dragend", () => {
        card.classList.remove("is-dragging");
    });
});

droppables.forEach((stage) => {
    stage.addEventListener("dragover", (event) => {
        event.preventDefault();
        const positionNearestCard =  searchNearestCard(stage, event.clientY);
        const currantCardDragged = document.querySelector(".is-dragging");

        if(!positionNearestCard) {
            console.log('if')
            stage.appendChild(currantCardDragged);
        } else {
            console.log('else')
            stage.insertBefore(currantCardDragged, positionNearestCard);
        }
    });
});

const searchNearestCard = (stage, mouseY) => {
    const stageCards = stage.querySelectorAll(".card:not(.is-dragging)");

    let closestCard = null;
    let closestOffset = Number.NEGATIVE_INFINITY;
    
    stageCards.forEach((card) => {
        const { top } = card.getBoundingClientRect();
        const differenceDistanceBetweenCards = mouseY - top;
        
        if(differenceDistanceBetweenCards < 0 && differenceDistanceBetweenCards > closestOffset) {
            closestOffset = differenceDistanceBetweenCards;
            closestCard = card;
        }

        return closestCard;
    });
};