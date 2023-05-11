// $(function() {
//     const currentRoute = window.location.pathname;
//     if(!currentRoute.split('/').includes('waiting')) return


//     $(document).on('click', '#send-button', async function() {
//         modal.show()

//         $('#main-modal .modal-body').html(`Fetching data`)

//         const response = await $.get(`/auth/email_model`);
//         if (!response) return

//         $('#main-modal .modal-title').text('Send an e-mail')
//         $('#main-modal .modal-body').html(response.view);
//     })

// });
