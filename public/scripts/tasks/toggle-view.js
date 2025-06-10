// Load saved view early
const savedView = localStorage.getItem('table-view') || 'table';

// Apply styles to buttons
function updateButtonStyle(button, isActive) {
    const activeClasses = [
        'bg-white', 'text-black', 'border-gray-300',
        'dark:bg-gray-800', 'dark:text-white', 'dark:border-gray-600'
    ];
    const inactiveClasses = [
        'text-gray-400', 'border-none',
        'dark:hover:bg-gray-700', 'dark:text-white', 'dark:hover:border-gray-600'
    ];

    const addClasses = isActive ? activeClasses : inactiveClasses;
    const removeClasses = isActive ? inactiveClasses : activeClasses;

    button.classList.remove(...removeClasses);
    button.classList.add(...addClasses);
}

// Switch between table and list view
function toggleView(viewType) {
    const istable = viewType === 'table';

    const tableView = document.getElementById('table-view');
    const listView = document.getElementById('list-view');
    const tableButton = document.getElementById('table-btn');
    const listButton = document.getElementById('list-btn');

    // Batch style updates inside requestAnimationFrame
    requestAnimationFrame(() => {
        tableView.style.display = istable ? 'block' : 'none';
        listView.style.display = istable ? 'none' : 'block';

        updateButtonStyle(tableButton, istable);
        updateButtonStyle(listButton, !istable);
    });

    localStorage.setItem('table-view', viewType);
}

// Wait for full DOM before running toggle
document.addEventListener('DOMContentLoaded', () => {
    requestAnimationFrame(() => {
        toggleView(savedView);
        window.toggleView = toggleView;
    });
});
