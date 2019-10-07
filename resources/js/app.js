require('./bootstrap');

let checkbox = document.querySelectorAll('.flag');

function checkedRecord(event) {
    let el = event.target;
    let type = el.getAttribute('data-type');
    let record_id = el.getAttribute('data-id');
    let value = el.checked;

    axios.post('/expenses/checked', {
        type, record_id, value
    }).then((response) => {
            console.log(response.data);
        })
}

if (checkbox) {
    checkbox.forEach(function (item) {
        item.addEventListener('click', checkedRecord);
    });
}