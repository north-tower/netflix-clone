import React from 'react'
import './LoginScreen.css'

function LoginScreen() {
  return (
    <div className='loginscreen'>
        <div className='loginScreen__background'>
            <img className='loginScreen__logo' 
            src='https://assets.stickpng.com/images/580b57fcd9996e24bc43c529.png' alt='netflix' />
        <button className='loginScreen__button'>Sign In</button>
        <div className='loginScreen__gradient' />
        </div>
    </div>
  ) 
}

export default LoginScreen