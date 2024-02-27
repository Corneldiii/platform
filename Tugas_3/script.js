const screen = document.querySelector('.screen');
const btn = document.getElementById('button');
var tinggi = 300;

btn.addEventListener('click', function () {
    var nama = document.getElementById('exampleInputName1').value;
    var jum = document.getElementById('exampleInputJumlah1').value;

    document.getElementById('exampleInputName1').value = ''; 
    document.getElementById('exampleInputJumlah1').value = '';

    var container = document.getElementById('input');

    container.innerHTML = '';
    

    for (var i = 0; i < jum; i++) {
        var formGroup = document.createElement('div');
        formGroup.className = 'form-group';
        
        var label = document.createElement('label');
        label.setAttribute('for', 'exampleInputPassword' + (i + 1));
        label.style.color = 'white';
        label.textContent = 'Pilihan ' + (i + 1) + ':';
        
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control form-control-sm';
        input.id = 'inputPilihan' + (i + 1);
        input.placeholder = 'pilihan ' + (i+1);
        
        formGroup.appendChild(label);
        formGroup.appendChild(input);
        
        container.appendChild(formGroup);
    }

    var submitButton = document.createElement('button');
    submitButton.type = 'button';
    submitButton.className = 'btn btn-primary mt-4';
    submitButton.textContent = 'Submit';
    submitButton.id = 'button2'
    container.appendChild(submitButton);

    ubahTinggi();
    var inputPil = {};

    var btn2 = document.getElementById('button2');

    btn2.addEventListener('click', function () {
        for (let i = 0; i < jum; i++) {
            inputPil[i] = document.getElementById('inputPilihan'+(i+1)).value;
            console.log(inputPil[i]);
            document.getElementById('inputPilihan'+(i+1)).value = '';
        }

        
    });

});

function ubahTinggi() {
    screen.style.height = 'fit-content';
}

