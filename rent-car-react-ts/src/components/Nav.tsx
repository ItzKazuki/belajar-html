import { useEffect, useState } from "react";
import http, { cookie } from "../api/http";


export default function Navbar() {
    const [isAuth, setIsAuth] = useState<boolean>(false);

    useEffect(() => {
        http.get("/user/info", cookie.get('token')).then(data => {
            data.user ? setIsAuth(true) : "";
        })
    }, [setIsAuth]);

    return (
        <header>
            <h3>Kz Rent Cars</h3>
            <nav>
                <a href="/">Home</a>
                <a href="/cars">Cars</a>
                <a href="/rent">Rent</a>
                {isAuth ?
                    <a href="/logout">Logout</a> : 
                    <>
                        <a href="/register">Register</a>
                        <a href="/login">Login</a>
                    </>
                }
            </nav>
        </header>
    );
}