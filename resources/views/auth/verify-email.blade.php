<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Merci pour l'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.") }}
    </div>

    <div id="status" class="mb-4 font-medium text-sm text-green-600 hidden">
        {{ __("Un nouveau code de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.") }}
    </div>

    <div>
        <form id="code-form">
            <label for="code" class="block font-medium text-sm text-gray-700">Code de vérification</label>
            <input type="text" name="code" id="code"
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <ul id="error" class="text-sm text-red-600 space-y-1 hidden">
                <li>code de verfication invalid</li>
            </ul>
        </form>
    </div>

    <div class="mt-4 flex items-center justify-between">
        <form id="email-form">
            <div>
                <x-primary-button id="resend-email">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>

        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>

        </form>
    </div>

    <script>
        // code verification
        // resend email

        window.onload = () => {
            window.axios = axios;
            const codeForm = document.querySelector('#code-form');
            const codeInput = codeForm.querySelector('input[name=code]');
            const emailForm = document.querySelector('#email-form');
            const btnResendEmail = document.querySelector('#resend-email');
            
            emailForm.onsubmit = (event) => {
                event.preventDefault();
                reSendMail();
            }

            codeForm.onsubmit = (event) => {
                event.preventDefault();
            }

            codeInput.oninput = async (event) => {
                code = codeInput.value;
                if (code.length === 6) {
                    try {
                        btnResendEmail.setAttribute('disabled', '');
                        response = await axios.post("{{ route('verification.code') }}", {
                            code
                        });
                        data = await response.data;
                        if (data.data.redirect) {
                            window.location.replace(data.data.redirect)
                        }
                    } catch (error) {
                        const errorData = error.response.data;
                        console.log(errorData)
                        if (errorData.data.status === 'error') {
                            document.querySelector('#error').classList.remove('hidden');
                            setTimeout(() => {
                                document.querySelector('#error').classList.add('hidden');
                            }, 5000)
                        }

                    }
                }
            }
        }

        const reSendMail = async () => {
            try {
                response = await axios.post("{{ route('verification.send') }}");
                data = await response.data;
                if (data.data.status === 'redirect' && data.data.redirect) {
                    window.location.replace(data.data.redirect);
                } else if (data.data.status === 'verification-link-sent') {

                    document.querySelector('#status').classList.remove('hidden')
                    setTimeout(() => {
                        document.querySelector('#status').classList.add('hidden')
                    }, 5000);
                }
            } catch (error) {
                console.log(error);
            }
        }

        function btnLoader(query, mode = true) {
            const elem = document.querySelector(query);
            if (mode) {
                elem.insertAdjacentHTML(
                    'afterbegin',
                    `<div role="status" class="loader">
                        <svg aria-hidden="true" class="w-5 h-5 mr-3 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>`
                )
                return;
            }
            elem.querySelector('.loader').remove();

        }
    </script>
</x-guest-layout>
