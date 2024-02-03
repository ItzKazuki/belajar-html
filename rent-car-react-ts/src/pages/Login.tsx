import { useState } from "react";
import http from "../api/http";
import { useNavigate } from "react-router-dom";
import Cookie from 'universal-cookie';

interface loginData {
    username: string,
    password: string
}

export default function Login() {
    const [userData, setUserData] = useState<loginData>({
        username: '',
        password: ''
    });
    const navigate = useNavigate();
    const cookie = new Cookie();
    
    const sendData = async (e: React.FormEvent) => {
        e.preventDefault();

        http.post("/auth/login", userData).then(data => {
            console.log(data.token)
            // set to cookie
            cookie.set('token', data.token);
            //redirect to home
            navigate("/");
        }).catch(err => {
            console.log(err)
        })
        // const token = await postLogin(userData);
        // console.log(token.token); // success send token
    }   

    const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>): void => {
        setUserData({
            ...userData,
            [e.target.name]: e.target.value,
        })
    }

    return (
        <div className="login-page">
            <div className="message-auth">
                <h2>Login</h2>
                <p>Login your account</p>
            </div>
            <div className="form-auth">
                <form onSubmit={sendData}>
                    <div className="field">
                        <label htmlFor="username">Username: </label>
                        <input type="text" name="username" id="username" onChange={handleInputChange}/>
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