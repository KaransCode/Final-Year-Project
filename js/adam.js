document.querySelector('.eye-button').addEventListener('click', function() {
	const passwordInput = document.querySelector('#password');
	const eyeButton = document.querySelector('.eye-button');

	if (passwordInput.type === 'password') {
		passwordInput.type = 'text';
		eyeButton.querySelector('i').classList.remove('fa-eye');
		eyeButton.querySelector('i').classList.add('fa-eye-slash');
	} else {
		passwordInput.type = 'password';
		eyeButton.querySelector('i').classList.remove('fa-eye-slash');
		eyeButton.querySelector('i').classList.add('fa-eye');
	}
});