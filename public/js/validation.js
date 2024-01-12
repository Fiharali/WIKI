document.querySelector('form').addEventListener('submit', function(event) {

    var title = document.getElementById('title').value;
    if (title === '') {
        alert('Please enter a title.');
        event.preventDefault();
        return;
    }

    var photo = document.getElementById('photo').value;
    if (!photo) {
        alert('Please select a photo.');
        event.preventDefault();
        return;
    }


    var category = document.querySelector('select[name="category"]').value;
    if (category === '') {
        alert('Please choose a category.');
        event.preventDefault();
        return;
    }

    var selectedTags = Array.from(document.querySelectorAll('select[name="tags[]"] option:checked')).map(option => option.value);
    if (selectedTags.length === 0) {
        alert('Please choose at least one tag.');
        event.preventDefault();
        return;
    }


    var content = document.getElementById('content').value;
    if (content === '') {
        alert('Please enter wiki content.');
        event.preventDefault();
        return;
    }

});
