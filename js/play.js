function roll() {
    $(".cube-container model-viewer").addClass("roll");
    setTimeout(function () {
        $(".dice-form").submit();
    }, 1500);
}