import './bootstrap';

import Alpine from 'alpinejs';

import 'flowbite';

window.Alpine = Alpine;

Alpine.start();


function updateClock() {
  const now = new Date();

  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');

  const timeElement = document.getElementById('time');
  timeElement.textContent = `${hours}:${minutes}`;


}

function startClock() {
  updateClock(); // Inicia o relógio imediatamente


  setInterval(updateClock, 60000);
}


window.onload = startClock;




const $targetEl = document.getElementById('cadastrar-modal');

const options = {
    placement: 'bottom-right',
    backdrop: 'dynamic',
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    },
};
import { Modal } from 'flowbite';



// instance options object
const instanceOptions = {
    id: 'cadastrar-modal',
    override: true
};

var modal = new Modal($targetEl, options, instanceOptions);

window.onload = modal;
