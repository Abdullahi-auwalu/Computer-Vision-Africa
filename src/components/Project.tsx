import Card from "./Card";

interface dataItems {
  id: string;
  text: string;
  image: string;
}

const data: dataItems[] = [
  {
    id: "1",
    text: "Weapon detection with automatic messaging",
    image: "/knife.png",
  },
  {
    id: "2",
    text: "Real time Vehicle detection counting and analysis",
    image: "/cars.png",
  },
  {
    id: "3",
    text: "Person detection with automatic nudity and Indecent dressing Blurring",
    image: "/human.png",
  },
  {
    id: "4",
    text: "Brain tumor detection",
    image: "/brainTumor.png",
  },
  {
    id: "5",
    text: "Cloth type prediction",
    image: "/cloth.png",
  },
  {
    id: "6",
    text: "Weapon detection with automatic messaging",
    image: "/knife.png",
  },
];

const Project = () => {
  return (
    <div className=" px-4 md:px-[160px] flex flex-col gap-12">
      <h1 className="text-4xl font-bold">Computer Vision Project</h1>
      <div className="flex flex-col md:flex-row flex-wrap md:items-start item-center justify-around gap-8">
        {data.map((item) => (
          <Card key={item.id} text={item.text} image={item.image} />
        ))}
      </div>
    </div>
  );
};

export default Project;
