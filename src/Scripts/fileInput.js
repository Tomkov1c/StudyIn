// Get elements
const fileInput = document.getElementById('fileToUpload');
const customButton = document.getElementById('customButton');
const fileName = document.getElementById('fileName');

customButton.addEventListener('click', function() {
    fileInput.click();
});

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
    } else {
        fileName.textContent = 'No file chosen';
    }
});

const observer = new MutationObserver(function(mutationsList, observer) {
    for (const mutation of mutationsList) {
        if (mutation.type === 'childList') {
            document.getElementById('submitForum').submit();
        }
    }
});

observer.observe(fileName, {
    childList: true,
    subtree: true,
});