import React, { useEffect, useState } from 'react'
import "./Nav.css"

function Nav() {
  const [show,handleShow] = useState(false);
  const transitionNavBar = () => {
    if (window.scrollY > 100){
      handleShow(true);
    }else{
      handleShow(false);
    }
  }

  useEffect(() => {
    window.addEventListener("scroll", transitionNavBar);
    return () => window.removeEventListener("scroll", transitionNavBar);
  }, []);

  return (
    <div className={`nav ${show && "nav__black"}`}>
      <div className='nav__contents'>
        <img className='nav__logo'
         src="https://logos-download.com/wp-content/uploads/2016/03/Netflix_Logo_2014-2048x550.png"
        alt="Neflix Logo" />

        <img className='nav__avatar'
        src="https://th.bing.com/th/id/OIP.0MBvv-m5TFNpQGFq0WrS0AHaHu?pid=ImgDet&w=820&h=856&rs=1"
        alt="avatar" />
      </div>
    </div>

  )
}

export default Nav