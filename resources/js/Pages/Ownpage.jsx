import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './Ownpage.css'

const Ownpage = (props) => {
    const { ownpage } = props;
    console.log(ownpage.images);
    
    return (
<body>
    <div class="loose-leaf">
        <h1>タイムカプセル</h1>
        <div class="box5">
            <div class="sample_box3_2">
                
                <div class="fashionable-box3">
                    <p>{ ownpage.year }に公開されました。</p>
                </div>
                <div class="fashionable-box3">
                    <p>思い出の言葉:{ ownpage.content }</p>
                </div>
                
                
                {
                (
                   ()=> {
                        if(ownpage.images === undefined) {
                        } else {
                        return (
                        <div>
                                { ownpage.images.map((image) => (
                                    <div key={image.id}>
                                    <img src="{ asset( image.path) }" width="500px" height="300px"/>
                                        <video controls loop autoplay muted width="500px" height="300px">
                                            <source src="{ asset( image.path) }" type="video"></source>
                                        </video>
                                </div>
                                )) }
                        </div>
                         )
                        }
                        }
                    )
                ()
            }
            </div>
        </div>
    </div>
    <div class="back">
                <Link href={`/future`}>戻る</Link>
            </div>
</body>
    );
}

export default Ownpage;