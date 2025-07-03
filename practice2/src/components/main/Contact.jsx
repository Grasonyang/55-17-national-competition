import StarIcon from './StarIcon';
import { useState } from 'react';
import './Contact.css'
function Contact() {
    return (
        <>
            <div id="contact"></div>
            <section id="contact-container">
                <div className="content">
                    <form action="" method="post">
                        <div className='name'>
                            <div>
                                <label htmlFor="first_name">First Name</label>
                                <input type="text" id='first_name' />
                            </div>
                            <div>
                                <label htmlFor="first_name">Last Name</label>
                                <input type="text" id='first_name' />
                            </div>
                        </div>
                        <div className='email'>
                            <label htmlFor="email">Email</label>
                            <input type="email" id='email' />
                        </div>
                        <div className='phone'>
                            <label htmlFor="phone">Phone</label>
                            <input type="text" id='phone' />
                        </div>
                    </form>
                    <div>
                        <StarIcon name="聯絡我們" deep={false}></StarIcon>
                    </div>
                </div>
            </section >
        </>
    )
}
export default Contact;