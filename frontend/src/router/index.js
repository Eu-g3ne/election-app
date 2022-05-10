import { createRouter, createWebHistory } from 'vue-router';
import VotersPage from '@/views/VotersPage.vue'
import CanidatesPage from '@/views/CandidatesPage.vue'
import PartiesPage from '@/views/PartiesPage.vue'
import HomePage from '@/views/HomePage.vue'
import ConstituenciesPage from '@/views/ConstituenciesPage.vue'
import PollingStationsPage from '@/views/PollingStationsPage.vue'
import ElectionsPage from '@/views/ElectionsPage.vue'

const routes = [
  {
    path: '/', 
    name: 'Home', 
    component: HomePage,
  },
  {
    path: '/voters', 
    name: 'voters', 
    component: VotersPage,
    children: [
      
    ]
  },
  {
    path: '/candidates', 
    name: 'candidates', 
    component: CanidatesPage,
  },
  {
    path: '/parties', 
    name: 'parties', 
    component: PartiesPage,
  },  
  {
    path: '/constituencies', 
    name: 'constituencies', 
    component: ConstituenciesPage,
  },
  {
    path: '/elections', 
    name: 'elections', 
    component: ElectionsPage,
  },
  {
    path: '/polling-stations', 
    name: 'pollingStations', 
    component: PollingStationsPage,
  },
  {
    path:'/voters/:id',
    name:'voters.show' , 
    component:()=>import('@/views/VoterShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
  {
    path:'/voters/:id/elections',
    name: 'electionsByVoter',
    component: ()=>import('@/views/ElectionsVoterPage.vue'),
    props: route=> ({...route.params, id:parseInt(route.params.id)})
  },
  {
    path:'/voters/:voterId/elections/:electionId/candidates',
    name: 'electionCandidates',
    component: ()=>import('@/views/ElectionCandidatesPage.vue'),
    props: route => ({
      ...route.params, 
      voterId:parseInt(route.params.voterId), 
      electionId:parseInt(route.params.electionId)
    })
  },
  {
    path:'/candidates/:id',
    name:'candidate.show' , 
    component:()=>import('@/views/CandidateShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
  {
    path:'/parties/:id',
    name:'party.show' , 
    component:()=>import('@/views/PartyShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
  {
    path:'/constituencies/:id',
    name:'constituency.show' , 
    component:()=>import('@/views/ConstituencyShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
  {
    path:'/polling-stations/:id',
    name:'pollingStation.show' , 
    component:()=>import('@/views/PollingStationShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
  {
    path:'/elections/:id',
    name:'election.show' , 
    component:()=>import('@/views/ElectionShow.vue'),
    props: route=>({...route.params, id:parseInt(route.params.id)}),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router