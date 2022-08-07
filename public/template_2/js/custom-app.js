const getElement = (element) => {
    return document.querySelector(element);
  };

const lockWindow = () => {
  $.blockUI({
    message: "<h3 style='color: #dcdcdc !important;'>Espere por favor...</h3>",
    css: {
      border: 'none',
      padding: '15px',
      backgroundColor: '#000',
      opacity: .7,
      color: '#fff',
      display: 'flex',
      top: 0,
      bottom: 0,
      left: 0,
      right: 0,
      'z-index': 1051,
      width: '100%',
      'justify-content': 'center',
      'align-items': 'center',
    }
  });
};

const unlockWindow = () => $.unblockUI();

  

function cleanError() {
  $('.mensaje-error').empty();
  $('.titulo-error').empty();
}

function fillSelect(selectElement, values, valueSelected, valueFirstOptionText) {
  let _content = `<option value="">${valueFirstOptionText}</option>`;

  values.forEach(value => {
    _content += `<option value="${value.id}">${value.name}</option>`;
  });

  selectElement.innerHTML = _content;

  if (valueSelected != null) {
    selectElement.value = valueSelected;
  }
}

function fillSelectWithOutFirstOption(selectElement, values, valueSelected) {

  if (selectElement != null) {
    let _content = ``;
    values.forEach(value => {
      _content += `<option value="${value.id}">${value.name}</option>`;
    });

    selectElement.innerHTML = _content;

    if (valueSelected != null) {
      selectElement.value = valueSelected;
    }
  }
}


function normalSwal(title, message, type){
          Swal.fire(
          title,
          message,
          type
        );
}

function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};