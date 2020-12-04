import { createStackNavigator } from '@react-navigation/stack';
import { createDrawerNavigator } from '@react-navigation/drawer';
import * as React from 'react';

import HomeScreen from '../screens/HomeScreen';
import SessionsScreen from '../screens/SessionsScreen';
import SessionRecordingScreen from '../screens/SessionRecordingScreen';
import { DrawerParamList, HomeParamList, SessionsParamList, SessionRecordingParamList } from '../types';

const Drawer = createDrawerNavigator<DrawerParamList>();

export default function DrawerNavigator() {
  return (
    <Drawer.Navigator>
      <Drawer.Screen
        name="Home"
        component={HomeNavigator}/>
      <Drawer.Screen
        name="My sessions"
        component={SessionsNavigator}
      />
      <Drawer.Screen
        name="Start a session"
        component={SessionRecordingNavigator}
      />
    </Drawer.Navigator>
  );
}

const HomeStack = createStackNavigator<HomeParamList>();

function HomeNavigator() {
  return (
    <HomeStack.Navigator>
      <HomeStack.Screen
        name="Moana"
        component={HomeScreen}
      />
    </HomeStack.Navigator>
  )
}

const SessionsStack = createStackNavigator<SessionsParamList>();

function SessionsNavigator() {
  return (
    <SessionsStack.Navigator>
      <SessionsStack.Screen
        name="My sessions"
        component={SessionsScreen}
      />
    </SessionsStack.Navigator>
  )
}

const SessionRecordingStack = createStackNavigator<SessionRecordingParamList>();

function SessionRecordingNavigator() {
  return (
    <SessionRecordingStack.Navigator>
      <SessionRecordingStack.Screen
        name="Recording in progress"
        component={SessionRecordingScreen}
      />
    </SessionRecordingStack.Navigator>
  )
}
