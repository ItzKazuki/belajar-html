import { useEffect, useState } from "react";
import Card from "../components/Card";
import http from "../api/http";

export interface carsData {
    id: number,
    name: string,
    type: string,
    manufacture: string,
    plat: string,
    price: number,
    description: string,
    created_at: string,
    updated_at: string,
    car_photo: string
}

export default function Cars() {
    const [cars, setCars] = useState<carsData[]>([]);

    // useEffect(() => {
    //     getCars().then(data => {
    //         setCars(data.cars);
    //     }).catch(err => {
    //         console.error(err);
    //     })
    // }, [setCars]);

    useEffect(() => {
        http.get("/car/show").then(data => {
            setCars(data.cars);
        }).catch(err => console.log(err))
    }, [setCars]);

    return (
        <div className="car">
        <h2>Cars</h2>
        <p>Rent your car now!</p>
        <div className="car-list">
            {cars.map((car) => (
                <Card 
                key={car.id}
                image={car.car_photo}
                title={car.name}
                price={car.price}
                to={car.id}
                />
            ))}
        </div>
    </div>
    );
}