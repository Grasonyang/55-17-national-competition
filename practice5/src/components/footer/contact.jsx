import './contact.css'
function Contact() {
    return (
        <>
            <div className="container">
                <div className="box" id="contact">
                    <h3 className="title">聯絡我們</h3>
                    <form action="">
                        <div>
                            <label htmlFor="">First Name / Last Name</label>
                            <input type="text" />
                        </div>
                        <div>
                            <label htmlFor="">Email</label>
                            <input type="text" />
                        </div>
                        <div>
                            <label htmlFor="">Form</label>
                            <input type="text" />
                        </div>
                        <button>Send</button>
                    </form>
                </div>
            </div>
        </>
    )
}
export default Contact;