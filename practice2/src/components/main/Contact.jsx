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
                        <input type="text" placeholder='First Name' name='first_name' />
                        <input type="text" placeholder='Last Name' name='second_name' />
                        <input type="email" placeholder='Email' name='email' />
                        <input type="tel" placeholder='Phone' pattern='[0-9]{4}-[0-9]{6}' name='phone' />
                        <button type='submit'>Send</button>
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