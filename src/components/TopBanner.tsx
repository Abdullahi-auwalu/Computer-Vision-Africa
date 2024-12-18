import Image from "next/image";

const TopBanner = () => {
  return (
    <div className="flex flex-col lg:flex-row w-full items-center  mt-32 lg:mt-0 gap-10 lg:pl-[100px]">
      <div className="w-full lg:w-3/5 p-8 gap-10 flex flex-col lg:-mt-40 lg:text-left text-center  ">
        <h1 className=" font-semibold text-5xl leading-[54px] lg:w-[700px] lg:pr-[0px]">
          Join the future of vision: Connect, Learn,and Innovate with the
          <span className="text-[#4B92D4] "> Computer Vision Africa</span>
        </h1>
        <p className="text-black text-base lg:w-[592px] leading-6 ">
          Steps into the world of cutting-edge technology with a vibrant
          community of computer vision enthusiasts, experts and learners.
          Whether you&#39;re diving into AI-driven image analysis or exploring
          new advancements in machine learning, our community offers a
          collaborative space to grow, share knowledge, and transform ideas into
          ground breaking solutions. Get access to resources, tutorials, and
          industry insights to elevate your skills and make a real impact in the
          world of computer vision.
        </p>
      </div>
      <div className="w-full lg:w-2/5 h-[877px] flex overflow-hidden p-4">
        <Image
          src="/bannerImg.png"
          alt=""
          width={500}
          height={500}
          className="w-[100rem] h-[600px] md:h-[700px]  md:w-[90rem] -mt-8"
        />
      </div>
    </div>
  );
};

export default TopBanner;
