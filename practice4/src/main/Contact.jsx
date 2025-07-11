
import './Contact.css';

function Contact() {
    return (
        <>
            <section className="container scroll-target " id="contact">
                <div className="child-container">
                    <h4 className="title">聯絡我們</h4>
                    <form action="">
                        <input type="text" placeholder='First Name' />
                        <input type="text" placeholder='Last Name' />
                        <input type="email" className="email" placeholder='Email' />
                        <input type="text" className="address" placeholder='Address' />
                        <button type="submit" className='submit'>Send</button>
                    </form>
                </div>
            </section>
        </>
    )
}
export default Contact;