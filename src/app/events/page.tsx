import Image from "next/image";

const page = () => {
  return (
    <div className="w-full h-auto px-8 lg:px-[130px] pt-20 bg-gray-100">
      {/* UPCOMING EVENTS */}
      <div className="flex flex-col gap-8 pb-24">
        <h2 className=" text-3xl font-semibold">Upcoming Events</h2>
        <div className="flex gap-8 flex-col lg:flex-row items-center justify-center">
          <div className="flex flex-col md:flex-row gap-4 md:w-[591px] md:h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center p-4">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
          <div className="flex flex-col md:flex-row gap-4 md:w-[591px] md:h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center p-4">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
        </div>
      </div>

      {/* PAST EVENT */}
      <div className="flex flex-col gap-8 pb-24 ">
        <h2 className=" text-3xl font-semibold">Past Events</h2>
        <div className="flex gap-8 flex-col lg:flex-row items-center justify-center">
          <div className="flex flex-col md:flex-row gap-4 md:w-[591px] md:h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center p-4">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
          <div className="flex gap-4 flex-col md:flex-row md:w-[591px] md:h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center p-4">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default page;
