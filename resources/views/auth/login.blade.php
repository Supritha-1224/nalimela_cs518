<!DOCTYPE html>
<html>
<style>
    /*assign full width inputs*/
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
   
    /*set a style for the buttons*/
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
   
    /* set a hover effect for the button*/
    button:hover {
        opacity: 0.8;
    }

   /*set the forgot password text*/
   span.psw {
       float: right;
       padding-top: 30px;
   }
   
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }

    footer{
        background: grey;
        font-size: 18px;
        padding: 35px;
        text-align: center;
        position: adsolute;
        right: 0;
        left: 0;
        bottom: 0;
    }
</style>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-large text-medium text-green-800">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        
        
            @csrf

            

            <div class="input">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
            </div>

            <div class="input">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password">
            </div>
            
            <div class="mt-4">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            
               

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
              
        </form>

    
    </x-jet-authentication-card>

     

    
    <footer>
         copyright &copy; <script>document.write(new Date().getFullYear())</script> 
    </footer>
</x-guest-layout>
