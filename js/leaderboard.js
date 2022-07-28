for (let i = 0; i < document.getElementsByClassName('leaderboard')[0].rows.length; i++) {
    document.getElementsByClassName('leaderboard')[0].rows[i].cells[1].innerHTML = document.getElementsByClassName('leaderboard')[0].rows[i].cells[1].innerHTML.replaceAll('<', '&lt;').replaceAll('>', '&gt;');
}