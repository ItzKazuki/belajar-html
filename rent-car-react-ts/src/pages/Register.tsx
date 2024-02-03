import { useState } from "react";
import { useNavigate } from "react-router-dom";
import http from "../api/http";

interface registerData {
    name: string,
    nik: number,
    username: string,
    telephone: number,
    email: string,
    password: string,
    birthday?: Date,
}

export default function Register() {
    const navigate = useNavigate();
    const [userData, setUserData] = useState<registerData>({
        name: '',
        nik: 0,
        username: '',
        telephone: 0,
        email: '',
        password: ''
    });

    const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>): void => {
        setUserData({
            ...userData,
            [e.target.name]: e.target.value,
        })
    }

    const sendData = (e: React.FormEvent) => {
        e.preventDefault();

        http.post("/auth/register", userData).then(res => {
            //redirect to home
            console.log(res.message);
            navigate("/");
        }).catch(err => console.log(err));
        
    }

    // disini kita harus fetch data

    return (
        <div className="register-page">
            <div className="message-auth">
                <h2>Register</h2>
                <p>Make new Account</p>
            </div>
            <div className="form-auth">
                <form onSubmit={sendData}>
                    <div className="field">
                        <label htmlFor="name">Name: </label>
                        <input type="text" name="name" id="name" onChange={handleInputChange}/>
                    </div>
                    <div className="field">
                        <label htmlFor="nik">Nik: </label>
                        <input type="number" name="nik" id="nik" onChange={handleInputChange}/>
                    </div>
                    <div className="field">
                        <label htmlFor="username">Username: </label>
                        <input type="text" name="username" id="username" onChange={handleInputChange}/>
                    </div>
                    <div className="field">
                        <label htmlFor="telephone">Telephone: </label>
                        <input type="number" name="telephone" id="telephone" onChange={handleInputChange}/>
                    </div>
                    <div className="field">
                        <label htmlFor="birthday">Birthdate: </label>
                        <input type="date" name="birthday" id="birthday" onChange={handleInputChange} />
                    </div>
                    <div className="field">
                        <label htmlFor="email">Email: </label>
                        <input type="email" name="email" id="email" onChange={handleInputChange}/>
                    </div>
                    <div className="field">
                        <label htmlFor="password">Password: </label>
                        <input type="password" name="password" id="password" onChange={handleInputChange}/>
                    </div>
                    <div className="btn-submit">
                        <button type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    );
}