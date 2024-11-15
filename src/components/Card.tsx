import Image from "next/image";

interface CardProps {
  text: string;
  image: string;
}

const Card: React.FC<CardProps> = ({ text, image }) => {
  return (
    <div className="w-auto md:w-[500px] md:h-[535px] bg-white mt-8 shadow-lg shadow-gray-500/50 pb-4">
      <Image
        src={image}
        alt=""
        width={300}
        height={300}
        className="w-full md:w-[500px] h-[400px]"
      />
      <h3 className="pt-4 text-2xl p-[50px] font-semibold text-center">
        {text}
      </h3>
    </div>
  );
};

export default Card;
