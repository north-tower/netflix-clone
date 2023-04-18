import React from 'react'
import './Banner.css';

function Banner() {
    function truncate(string,n) {
        return string?.length > n ? string.substr(0 ,n-1) + '...' : string;
    }

  return (
    <header className='banner' style={{
        backgroundSize: "cover",
        backgroundImage: `url('https://blog.phonehouse.es/wp-content/uploads/2015/10/Netflix-banner.jpg')`,
        backgroundPosition: "center center",
  }}>
    <div className='banner__contents'>
        <h1 className='banner__title'>Movie Name</h1>
        <div className='banner__buttons'>
            <button className='banner__button'>
                Play
            </button>
            <button className='banner__button'>
                My List
            </button>
        </div>
        <h1 className='banner__description'>
            {truncate(`Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel doloribus culpa impedit laborum magnam doloremque, perspiciatis deleniti provident, ab consequatur sint
            , dolor excepturi non! Impedit, aliquid beatae! Ratione, quaerat animi?`,50)}
              </h1>
    </div>

    <div className='banner--fadeBottom' />

   
    </header>
  )
}

export default Banner