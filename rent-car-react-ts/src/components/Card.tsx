interface cardProps {
    key: number,
    image: string,
    title: string,
    price: number,
    to: number
}

export default function Card({key, image, title, price, to}: cardProps) {
    return (
        <div className="card-container" key={key}>
            <div className="card-image">
                <img src={image} />
            </div>
            <div className="card-content">
                <div className="card-title">
                    <h3>{title}</h3>
                </div>
                <div className="card-price">
                    <p>Rp. {price}</p>
                </div>
            </div>
            <div className="card-btn">
                <button><a href={"/car/info/" + to}>Rent now</a></button>
            </div>
        </div>
    );
}