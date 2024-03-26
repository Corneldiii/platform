const screen = document.querySelector('.screen');
const btn = document.getElementById('button');
var tinggi = 300;

btn.addEventListener('click', function () {
    var namDep = document.getElementById('InputNamaDepan').value;
    var namBel = document.getElementById('InputNamaBelakang').value;
    var email = document.getElementById('InputEmail').value;
    var jum = document.getElementById('exampleInputJumlah1').value;

    if (namDep !== '' && jum !== '' && namBel !== '' && email !== '') {
        document.getElementById('InputNamaDepan').value = '';
        document.getElementById('InputNamaBelakang').value = '';
        document.getElementById('InputEmail').value = '';
        document.getElementById('exampleInputJumlah1').value = '';

        var container = document.getElementById('inputs');

        container.innerHTML = '';

        for (var i = 0; i < jum; i++) {
            var formGroup = document.createElement('div');
            formGroup.className = 'form-group';

            var label = document.createElement('label');
            label.setAttribute('for', 'hobi' + (i + 1));
            label.style.color = 'white';
            label.textContent = 'Pilihan ' + (i + 1) + ':';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control form-control-sm m-1';
            input.id = 'inputPilihan' + (i + 1);
            input.placeholder = 'pilihan ' + (i + 1);

            formGroup.appendChild(label);
            formGroup.appendChild(input);

            container.appendChild(formGroup);
        }
        ubahTinggi();

        var submitButton = document.createElement('button');
        submitButton.type = 'button';
        submitButton.className = 'btn btn-primary mt-4';
        submitButton.textContent = 'Submit';
        submitButton.id = 'button2'
        container.appendChild(submitButton);

        let inputPil = [];
        var kunci = false;

        var btn2 = document.getElementById('button2');

        btn2.addEventListener('click', function () {
            for (var i = 0; i < jum; i++) {
                inputPil[i] = document.getElementById('inputPilihan' + (i + 1)).value;
                console.log(inputPil[i]);
                document.getElementById('inputPilihan' + (i + 1)).value = '';
            }
            if (inputPil[0] !== '') {
                var form = document.createElement('div');
                form.className = 'form-group mt-5';
                form.style.display = 'flex';
                form.style.flexDirection = 'column';
                form.style.gap = '10px';

                for (var i = 0; i < jum; i++) {
                    console.log("masuk")
                    var inputPage = document.createElement('div');
                    inputPage.className = 'form-group';
                    inputPage.style.display = 'flex';
                    inputPage.style.gap = '5px';
                    inputPage.style.marginBottom = '20px';

                    var inputcheck = document.createElement('input');
                    inputcheck.type = 'checkbox';
                    inputcheck.className = 'custom-control'
                    inputcheck.id = 'checkbox' + (1 + i);
                    inputcheck.value = inputPil[i];

                    var lbl = document.createElement('label');
                    lbl.setAttribute('for', 'checkboxLbl' + (i + 1));
                    lbl.style.color = 'white';
                    lbl.textContent = inputPil[i];

                    inputPage.appendChild(inputcheck);
                    inputPage.appendChild(lbl);

                    form.appendChild(inputPage);

                }
                ubahTinggi();
                container.appendChild(form);

                var mdalBtn = document.getElementById('mdl');

                mdalBtn.style.display = 'flex';
                mdalBtn.style.flexDirection = 'column';
                mdalBtn.style.position = 'relative';
                mdalBtn.style.zIndex = 1;

                var mdlB = document.getElementById('mdlBody');
                mdlB.innerHTML = '';

                let pilihan = [];

                mdalBtn.addEventListener('click', function () {
                    for (let index = 0; index < jum; index++) {
                        var chk = document.getElementById('checkbox' + (index + 1));
                        console.log("masuk cuy");
                        if (chk.checked) {
                            pilihan[index] = chk.value;
                        }
                    }
                    var mymdl = document.getElementById('modalTest');

                    if (pilihan.length == 0) {
                        mymdl.style.display = 'none';
                        alert('Toloh pilih terlebih dahulu!!!');

                    } else {


                        var text = document.createElement('p');
                        text.textContent = 'Halo Nama depan saya ' + namDep + ' dan nama belakang saya ' + namBel + ' Alamat email saya  ' + email + ' dan saya memiliki ' + jum + ' hobi yaitu : ';

                        mdlB.appendChild(text);

                        for (let index = 0; index < jum; index++) {
                            var text2 = document.createElement('p');
                            text2.textContent = '- ' + inputPil[index];
                            mdlB.appendChild(text2);
                        }

                        var text3 = document.createElement('p');


                        text3.textContent = 'Dan saya menyukai :';
                        mdlB.appendChild(text3);
                        for (let index = 0; index < pilihan.length; index++) {
                            console.log(pilihan[index]);
                            var text6 = document.createElement('p');
                            if (typeof pilihan[index] !== 'undefined') {
                                text6.textContent = '-' + pilihan[index]
                                mdlB.appendChild(text6);
                            }
                            
                        }
                    }

                });
            } else {
                alert('Tolong Masukan nilai kedalam pilihan anda!!!!');
            }
        });
    } else {
        alert('Please enter the value first!!!');
    }

});

function ubahTinggi() {
    screen.style.height = 'fit-content';
}

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function EducationScroll() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        if (isElementInViewport(card)) {
            if (card.id === 'sd' || card.id === 'sma') {
                card.style.animation = 'slideInLeft 1s ease-out';
            } else if (card.id === 'smp' || card.id === 'kuliah') {
                card.style.animation = 'slideInRight 0.5s ease-out';
            }
            card.style.opacity = 1;
        }
    });
}

function memoriesScroll() {
    const cards = document.querySelectorAll('.Cm');
    cards.forEach(card => {
        if (isElementInViewport(card)) {
            card.classList.add('animation');
        }
    });
}

document.addEventListener('DOMContentLoaded', EducationScroll);
window.addEventListener('scroll', EducationScroll);

document.addEventListener('DOMContentLoaded', memoriesScroll);
window.addEventListener('scroll', memoriesScroll);
