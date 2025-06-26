
function showGrid(gridId) {
    var grids = document.querySelectorAll('.content');
    grids.forEach(function(grid) {
        grid.classList.remove('active');
    });
    document.getElementById(gridId).classList.add('active');
}
