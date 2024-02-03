import { useEffect, useState } from "react";
import http, { cookie } from "../api/http";

interface userData {
    name: string,
    nik: number,
    username: string,
    telephone: number,
    email: string,
    password: string,
    birthday?: Date,
}

export default function Home() {
    const [userData, setUserData] = useState<userData>();

    useEffect(() => {
        http.get("/user/info", cookie.get("token")).then(data => {
            setUserData(data.user)
        })
    }, [setUserData]);
    
    return (
        <div className="main-content">
            { userData ?
                <h3>Hello, {userData.name}</h3> :
                <h3>Hello Customers!</h3>
            }
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis culpa autem debitis necessitatibus molestias, dolores suscipit fuga et possimus repellendus!</p>
        </div>
    );
}