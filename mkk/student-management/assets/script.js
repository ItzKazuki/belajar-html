// insert id to form delete
function studentDelete(nisn) {
  document.getElementById('delete-modal-nisn').value = nisn;
  document.getElementById('delete_modal_body').innerHTML += nisn;

  // show modal
  document.getElementById('delete_student_modal').showModal();
}

// insert details student to form
function studentEdit(nisn, nama, kelas, nilai) {
  document.getElementById('default-nisn').value = nisn;
  document.getElementById('edit-nisn').value = nisn;
  document.getElementById('edit-name').value = nama;
  document.getElementById('edit-class').value = kelas;
  document.getElementById('edit-nilai').value = nilai;

  //show modal
  document.getElementById('edit_student_modal').showModal();
}

// close a modal with params id
function closeModal(id) {
  event.preventDefault();
  document.getElementById(id).close()
}

// show error modal
function errorModal(message) {
  const modalId = document.getElementById('error-modal');
  modalId.getElementsByTagName('p')[0].innerHTML = message;
  return modalId.showModal();
}

// show error modal
function successModal(message) {
  const modalId = document.getElementById('success-modal');
  modalId.getElementsByTagName('p')[0].innerHTML = message;
  return modalId.showModal();
}

//validate form
var reg = /^\d+$/;

//create
function validateCreateForm() {
  const formData = document.forms['add-student'];

  if(!reg.test(formData['nisn'].value)) {
    event.preventDefault();
    // return alert('nisn must be number');
    return errorModal('nisn must be a number');
  }

  if(!reg.test(formData['nilai'].value)) {
    event.preventDefault();
    // return alert('nilai must be number');
    return errorModal('nilai must be number');
  }

  if(formData['nilai'].value > 100 || formData['nilai'].value < 0) {
    event.preventDefault();
    // return alert('nilai harus lebih dari 0 dan kurang dari 100');
    return errorModal('nilai harus lebih dari 0 dan kurang dari 100');
  }

}

//edit
function validateEditForm() {
  const formData = document.forms['edit-student'];

  if(!reg.test(formData['nisn'].value)) {
    event.preventDefault();
    // return alert('nisn must be number');
    return errorModal('nisn must be a number');
  }

  if(!reg.test(formData['nilai'].value)) {
    event.preventDefault();
    // return alert('nilai must be number');
    return errorModal('nilai must be number');
  }

  if(formData['nilai'].value > 100 || formData['nilai'].value < 0) {
    event.preventDefault();
    // return alert('nilai harus lebih dari 0 dan kurang dari 100');
    return errorModal('nilai harus lebih dari 0 dan kurang dari 100');
  }
}

function validateDeleteForm() {
  const formData = document.forms['delete-student'];
  if(!reg.test(formData['nisn'].value)) {
    event.preventDefault();
    // return alert('nisn must be number');
    return errorModal('nisn must be a number');
  }
}